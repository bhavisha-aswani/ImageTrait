<?php
  
namespace App\Traits;
  
use Illuminate\Http\Request;
  
trait ImageTrait {
  
    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function verifyAndUpload(Request $request, $fieldname = 'image', $directory = 'images' ) {
         $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);
         
        if( $request->hasFile( $fieldname ) ) {

            return $request->file($fieldname)->store($directory, 'public');
  
        }
  
        return null;
  
    }
  
}