<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasFactory;

    protected $table ='notifications';

    protected $fillable = [
           'type',
           'data',
           'read_at',
       ];
   
       public function user(): BelongsTo
       {
           return $this->belongsTo(User::class);
       }
   
       public function markAsRead()
       {
           $this->update(['read_at' => now()]);
       }
   
       public function getUnreadNotifications()
       {
           return static::where('user_id', auth()->user()->id)
               ->whereNull('read_at')
               ->orderBy('created_at', 'desc')
               ->get();
       }
}
