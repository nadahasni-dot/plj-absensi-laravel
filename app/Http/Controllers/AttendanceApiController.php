<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        return response()->json(
            [
                'success' => true,
                'message' => 'get history success',
                'data' => Attendance::where('id_user', $user->id)->orderBy('created_at', 'DESC')->get(),
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'type' => 'required',
        ]);

        $user = $request->user();
        $now = date('Y-m-d H:i:s');

        if ($params['type'] == 'IN') {
            $attendance = Attendance::whereDate('clock_in', '=', date('Y-m-d'))->first();

            if ($attendance) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'anda telah melakukan absensi masuk',
                        'data' => $attendance,
                    ],
                    403
                );
            }

            $attendance = Attendance::create([
                'id_user' => $user->id,
                'clock_in' => $now,
                'clock_out' => null,
            ]);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'berhasil melakukan absensi masuk',
                ],
                200
            );
        } else {
            $attendance = Attendance::whereDate('clock_in', '=', date('Y-m-d'))->first();

            if (!$attendance) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'anda belum melakukan absensi masuk',
                    ],
                    403
                );
            }

            if ($attendance->clock_out != null) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'anda telah melakukan absensi pulang',
                    ],
                    403
                );
            }

            $status = Attendance::whereDate('clock_in', '=', date('Y-m-d'))->update([
                'clock_out' => date('Y-m-d H:i:s'),
            ]);

            if (!$status) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'gagal melakukan absensi pulang',
                    ],
                    403
                );
            }

            return response()->json(
                [
                    'success' => true,
                    'message' => 'berhasil melakukan absensi pulang',
                ],
                200
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(
            [
                'success' => true,
                'message' => 'get detail success',
                'data' => Attendance::where('id', $id)->get()->first(),
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
