<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Booking;

class TaskBookingNotification extends Notification
{
    use Queueable;

    protected $task;

    public function __construct(Booking $task)
    {
        $this->task = $task;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Pesanan Baru')
            ->line('Tanggal Masuk : ' . date('d F Y', strtotime($this->task->created_at)))
            ->line('ID Pemesanan : ' . $this->task->token)
            ->line('Nama Pemesan : ' . $this->task->User->name)
            ->line('Produk dengan nama : ' . $this->task->Product->name)
            ->line('Jumlah Pesanan : ' . $this->task->quantity)
            ->line('Lokasi Penyewaan : ' . $this->task->location)
            ->line('Waktu Penyewaan : ' . date('d F Y', strtotime($this->task->rental_date)))
            ->line('Waktu Pengembalian : ' . date('d F Y', strtotime($this->task->return_date)))
            ->line('Harga Total : ' . $this->task->total);
    }
}
