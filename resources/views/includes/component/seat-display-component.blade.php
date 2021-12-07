<link href='/assets/css/seat-style.css' rel='stylesheet'>

<div class='text-center text-light text-uppercase mt-30px seat-container' style="position: relative"'>
@if ($booking == '[]')
    <div class='available-seat seat-container'>
        @elseif ( Auth::check() && (string)Auth::user()->id == $booker_id ?? '')
            <div class='booked-by-me seat-container'>
                @else
                    <div class='booked-seat seat-container'>
                        @endif
                        @if ($user_picture != '')
                            <div class="user-container-booked-seat">
                                <div class="user-name-booked-seat">{{ $user_name }}</div>
                                <img src="{{ $user_picture }}" class="user-picture-booked-seat">
                            </div>
                            <div class='booked-seat-type-btn'>{{ $type ?? '' }}</div>
                        @else
                            <div class='seat-type-btn'>{{ $type ?? '' }}</div>
                        @endif
                        <div class='seat-num'><b>Seat {{ $seat_number ?? '' }}</b></div>
                    </div>
            </div>