<?php

namespace App\Http\Controllers;

use App\Models\AssessmentResult;
use Illuminate\Http\Request;

class AssessmentResultController extends Controller
{
    /**
     * Get a specific assessment result for the authenticated user.
     */
    public function show(Request $request, string $type)
    {
        $result = AssessmentResult::where('user_id', $request->user()->id)
            ->where('type', $type)
            ->first();

        if (!$result) {
            return response()->json(null);
        }

        return response()->json($result->result_data);
    }

    /**
     * Save (upsert) an assessment result for the authenticated user.
     */
    public function save(Request $request, string $type)
    {
        $request->validate([
            'result_data' => 'required|array',
        ]);

        $result = AssessmentResult::updateOrCreate(
            ['user_id' => $request->user()->id, 'type' => $type],
            ['result_data' => $request->result_data]
        );

        return response()->json([
            'message' => 'Hasil asesmen berhasil disimpan.',
            'data' => $result->result_data,
        ]);
    }

    /**
     * Get all assessment results for the authenticated user.
     */
    public function index(Request $request)
    {
        $results = AssessmentResult::where('user_id', $request->user()->id)->get();
        $data = [];
        foreach ($results as $r) {
            $data[$r->type] = $r->result_data;
        }
        return response()->json($data);
    }

    /**
     * Public endpoint: get assessment result by userId and type (for student portal).
     * Only returns if the portal account is linked to that guru_bk.
     */
    public function publicShow(string $userId, string $type)
    {
        $result = AssessmentResult::where('user_id', $userId)
            ->where('type', $type)
            ->first();

        if (!$result) {
            return response()->json(null);
        }

        return response()->json($result->result_data);
    }
}
