{{-- {{$ho_ten}} --}}

{{-- @foreach($monhoc as $mon)
{{$mon}}
@endforeach
 --}}
@forelse($monhoc as $mh)

{{$mh}}

@empty
mảng rỗng
@endforelse