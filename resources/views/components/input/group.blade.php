 @props([
 'label' => false,
 'for' =>false,
 'error' => false
 ])

 <div class="form-group">
     <label for="{{ $for }}">{{ $label }}</label>
     {{ $slot }}

     @if ($error)
         <div class="alert alert-danger">{{ $error }}</div>
     @endif
 </div>
