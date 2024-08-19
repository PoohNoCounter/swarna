<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Booking;

class TaskDeadlineNotification extends Notification
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
            ->subject('Pengembalian Produk')
            ->line('Produk dengan nama ' . $this->task->Product->name . ' sudah masuk tenggat waktu pengembalian.')
            ->line('Data Pemesanan :')
            ->line('Nama Pemesan : ' . $this->task->User->name)
            ->line('Produk dengan nama : ' . $this->task->Product->name)
            ->line('Jumlah Pesanan : ' . $this->task->quantity)
            ->line('Lokasi Penyewaan : ' . $this->task->location)
            ->line('Waktu Penyewaan : ' . date('d F Y', strtotime($this->task->rental_date)))
            ->line('Waktu Pengembalian : ' . date('d F Y', strtotime($this->task->return_date)))
            ->line('Terima kasih telah menggunakan layanan kami!');
    }
}
