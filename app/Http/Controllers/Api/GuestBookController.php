<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GuestBook;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GuestBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $guestbooks = GuestBook::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $guestbooks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'organization' => 'nullable|string|max:255',
            'purpose' => 'required|string',
            'message' => 'nullable|string',
            'visit_date' => 'required|date',
        ]);

        $guestbook = GuestBook::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Guest book entry created successfully',
            'data' => $guestbook
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $guestbook = GuestBook::find($id);

        if (!$guestbook) {
            return response()->json([
                'success' => false,
                'message' => 'Guest book entry not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $guestbook
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $guestbook = GuestBook::find($id);

        if (!$guestbook) {
            return response()->json([
                'success' => false,
                'message' => 'Guest book entry not found'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'organization' => 'nullable|string|max:255',
            'purpose' => 'sometimes|required|string',
            'message' => 'nullable|string',
            'visit_date' => 'sometimes|required|date',
        ]);

        $guestbook->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Guest book entry updated successfully',
            'data' => $guestbook
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $guestbook = GuestBook::find($id);

        if (!$guestbook) {
            return response()->json([
                'success' => false,
                'message' => 'Guest book entry not found'
            ], 404);
        }

        $guestbook->delete();

        return response()->json([
            'success' => true,
            'message' => 'Guest book entry deleted successfully'
        ]);
    }
}
