<?php

namespace App\Http\Controllers;

use App\Models\SavedReport;
use Illuminate\Http\Request;

class SavedReportController extends Controller
{
    /**
     * List all saved reports for the authenticated user.
     */
    public function index(Request $request)
    {
        $reports = SavedReport::where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($reports);
    }

    /**
     * Save a new report.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'      => 'required|string|max:255',
            'tipe'       => 'required|string|max:50',
            'stats_data' => 'required|array',
            'format'     => 'in:PDF,Excel',
        ]);

        $validated['user_id'] = $request->user()->id;

        $report = SavedReport::create($validated);

        return response()->json($report, 201);
    }

    /**
     * Delete a saved report.
     */
    public function destroy(Request $request, SavedReport $report)
    {
        // Ensure user owns this report
        if ($report->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $report->delete();
        return response()->json(['message' => 'Laporan berhasil dihapus.']);
    }
}
