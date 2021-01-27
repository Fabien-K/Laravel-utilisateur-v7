<?php 

namespace App\Http\Controllers\Auth;

use App\Mail\UserConfirmed;
use Illuminate\Support\Facades\Mail;

trait MustVerifyEmailImproved
{
  /**
   *  inscrit l email comme etant vérifié 
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