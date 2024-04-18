<?php

namespace App\Mail;
use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingRequestReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $user; // Define public property to hold user data
    public $booking; // Define public property to hold booking data

    /**
     * Create a new message instance.
     */
    public function __construct($user, $booking)
    {
        $this->user = $user; // Assign user data to public property
        $this->booking = $booking; // Assign booking data to public property
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Request Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.booking_request_received',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->view('emails.booking_request_received')
        ->subject('Booking Request Received')
        ->with([
                        'user' => $this->user,
                        'booking' => $this->booking,
                    ]);
    }
}
