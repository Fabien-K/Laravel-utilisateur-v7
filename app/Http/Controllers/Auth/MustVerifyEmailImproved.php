<?php 

namespace App\Http\Controllers\Auth;

use App\Mail\UserConfirmed;
use Illuminate\Support\Facades\Mail;

trait MustVerifyEmailImproved
{
  /**
   * si le mail est vérifié averti l'admin par mail
   * @return bool
   */
  public function markEmailAsVerified()
  {
    if($this->forcefill([
      'email_verified_at'=> $this->freshTimestamp(),
    ])->save())
    {
      Mail::send(new UserConfirmed($this->email));
      return true;
    }
  }

}