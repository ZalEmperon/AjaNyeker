<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Keranjang;
use App\Models\Biodata;

class ConstantView
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
      $userId = Auth::id(); 
      $itemCount = Keranjang::where('id_user', $userId)->count();
      $view->with('itemCount', $itemCount);

      $biodata = Biodata::where('id_user', $userId)->first();
      $view->with('databiodata', $biodata);
    }
}
