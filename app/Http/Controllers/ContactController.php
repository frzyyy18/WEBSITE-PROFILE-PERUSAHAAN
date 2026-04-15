<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    /**
     * Tampilkan halaman kontak
     */
    public function index()
    {
        return view('kontak');
    }

    /**
     * Proses kirim form kontak
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:20',
            'message' => 'required|string|min:10|max:1000',
        ]);

        // Kirim email ke alamat kamu
        Mail::to('gunawan@sriwijayaserangkai.id')
            ->send(new ContactFormMail($validated));

        return redirect()
            ->route('kontak')
            ->with('success', 'Pesan Anda berhasil dikirim. Terima kasih! Kami akan segera menghubungi Anda.');
    }
}