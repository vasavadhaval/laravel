<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\BookingRequestConfirmation;
use App\Mail\BookingRequestRejection;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Dompdf\Dompdf;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::all(); // Fetch all bookings
        return view('backend.booking.index', compact('bookings'));
    }
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return response()->json(['message' => 'Booking deleted successfully']);
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id); // Find booking by ID
        return view('backend.booking.show', compact('booking'));
    }
    public function userindex()
    {
        // Retrieve bookings associated with the authenticated user
        $bookings = Auth::user()->bookings()->get();

        return view('backend.booking.index', compact('bookings'));
    }
    public function userdestroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return response()->json(['message' => 'Booking deleted successfully']);
    }

    public function usershow($id)
    {
        $booking = Booking::findOrFail($id); // Find booking by ID
        return view('backend.booking.show', compact('booking'));
    }
    // Other methods like edit, update, delete, etc., as needed
    public function changeStatus(Booking $booking)
    {
        // Assuming you have a form parameter called "status" indicating the new status
        $status = request('status');

        // Validate the status
        if (!in_array($status, ['accepted', 'rejected'])) {
            return back()->with('error', 'Invalid status.');
        }

        // Update the booking status
        $booking->update(['booking_status' => $status]);

        // Retrieve the user associated with the booking
        $user = $booking->user;

        // Send email confirmation based on updated booking status
        if ($status == 'accepted') {
            Mail::to($user->email)->send(new BookingRequestConfirmation($user, $booking));
        } elseif ($status == 'rejected') {
            Mail::to($user->email)->send(new BookingRequestRejection($user, $booking));
        }

        return back()->with('success', 'Booking status updated successfully.');
    }
    public function downloadInvoice($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);

        // Load HTML template for invoice
        $html = view('backend.invoices.booking_invoice', compact('booking'))->render();

        // Initialize Dompdf
        $dompdf = new Dompdf();

        // Load HTML content
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (output)
        $dompdf->render();

        // Generate a unique file name using the booking ID and current date
        $pdfFileName = 'booking_' . $booking->id . '_' . date('Y-m-d') . '.pdf';

        // Stream the PDF with the custom file name
        return $dompdf->stream($pdfFileName);
    }

}
