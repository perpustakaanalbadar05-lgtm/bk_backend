<?php

namespace App\Http\Controllers;

use App\Models\PortalAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PortalAccountController extends Controller
{
    /**
     * List portal accounts created by the authenticated guru_bk.
     */
    public function index(Request $request)
    {
        $accounts = PortalAccount::where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($a) {
                return [
                    'id'           => $a->id,
                    'name'         => $a->name,
                    'username'     => $a->username,
                    'role'         => $a->role,
                    'siswa'        => $a->siswa,
                    'kelas'        => $a->kelas,
                    'visible_menus'=> $a->visible_menus,
                    'created_at'   => $a->created_at,
                ];
            });

        return response()->json($accounts);
    }

    /**
     * Create a new portal account.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:100|unique:portal_accounts,username',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:kepala_sekolah,pengawas,murid,orang_tua',
            'siswa'    => 'nullable|string|max:255',
            'kelas'    => 'nullable|string|max:50',
            'visible_menus' => 'nullable|array',
        ]);

        $validated['user_id']  = $request->user()->id;
        $validated['password'] = Hash::make($validated['password']);

        $account = PortalAccount::create($validated);

        return response()->json([
            'id'           => $account->id,
            'name'         => $account->name,
            'username'     => $account->username,
            'role'         => $account->role,
            'siswa'        => $account->siswa,
            'kelas'        => $account->kelas,
            'visible_menus'=> $account->visible_menus,
            'created_at'   => $account->created_at,
        ], 201);
    }

    /**
     * Update a portal account (menus, siswa link, etc.).
     */
    public function update(Request $request, PortalAccount $portalAccount)
    {
        if ($portalAccount->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'name'          => 'sometimes|string|max:255',
            'password'      => 'sometimes|string|min:6',
            'siswa'         => 'nullable|string|max:255',
            'kelas'         => 'nullable|string|max:50',
            'visible_menus' => 'nullable|array',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $portalAccount->update($validated);

        return response()->json([
            'id'           => $portalAccount->id,
            'name'         => $portalAccount->name,
            'username'     => $portalAccount->username,
            'role'         => $portalAccount->role,
            'siswa'        => $portalAccount->siswa,
            'kelas'        => $portalAccount->kelas,
            'visible_menus'=> $portalAccount->visible_menus,
        ]);
    }

    /**
     * Delete a portal account.
     */
    public function destroy(Request $request, PortalAccount $portalAccount)
    {
        if ($portalAccount->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $portalAccount->delete();
        return response()->json(['message' => 'Akun portal berhasil dihapus.']);
    }

    /**
     * Portal Login — public endpoint.
     * Verifies username & password for the portal accounts linked to a specific guru_bk (via user_id).
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'user_id'  => 'nullable|integer', // optional filter by guru_bk
        ]);

        $query = PortalAccount::where('username', $request->username);

        // If user_id supplied, limit search to that teacher's accounts
        if ($request->user_id) {
            $query->where('user_id', $request->user_id);
        }

        $account = $query->first();

        if (!$account || !Hash::check($request->password, $account->password)) {
            return response()->json(['message' => 'Username atau password salah.'], 401);
        }

        return response()->json([
            'account' => [
                'id'           => $account->id,
                'name'         => $account->name,
                'username'     => $account->username,
                'role'         => $account->role,
                'siswa'        => $account->siswa,
                'kelas'        => $account->kelas,
                'user_id'      => $account->user_id, // guru_bk owner ID
                'visible_menus'=> $account->visible_menus,
            ],
        ]);
    }
}
