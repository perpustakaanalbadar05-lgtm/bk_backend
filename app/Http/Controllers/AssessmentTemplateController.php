<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssessmentTemplateController extends Controller
{
    public function getTemplate(Request $request, $type)
    {
        $template = \App\Models\AssessmentTemplate::where('user_id', $request->user()->id)
            ->where('type', $type)
            ->first();

        return response()->json([
            'status' => 'success',
            'data' => $template ? $template->master_data : null,
        ]);
    }

    public function saveTemplate(Request $request, $type)
    {
        $request->validate([
            'master_data' => 'required|array',
        ]);

        $template = \App\Models\AssessmentTemplate::updateOrCreate(
            ['user_id' => $request->user()->id, 'type' => $type],
            ['master_data' => $request->master_data]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Template berhasil disimpan.',
            'data' => $template->master_data,
        ]);
    }

    public function getPublicTemplate($userId, $type)
    {
        $template = \App\Models\AssessmentTemplate::where('user_id', $userId)
            ->where('type', $type)
            ->first();

        return response()->json([
            'status' => 'success',
            'data' => $template ? $template->master_data : null,
        ]);
    }
}
