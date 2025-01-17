<div class='text-center text-light text-uppercase' onClick='bookSeat()'>
    @if ($seat->booking == '[]' && !Auth::check())
        <div class='available-seat seat-container'>
            @elseif ($seat->booking == '[]' && Auth::check())
                <div class='seat-bg-color seat-container'>
                    @elseif ( Auth::check() && (string)Auth::user()->id == $seat->booking[0]->user_id ?? '')
                        <div class='booked-by-me seat-container'>
                            @else
                                <div class='booked-seat seat-container'>
                                    @endif
                                    @if ($seat->booking != '[]' && Auth::check())
                                        <div>{{ $seat->seatType->name ?? '' }}</div>
                                    @else
                                        <div class='seat-type-btn'>{{ $seat->seatType->name ?? '' }}</div>
                                    @endif
                                    <div class='seat-num'><b>Seat {{ $seat->seat_number ?? '' }}</b></div>
                                    @if ($seat->booking == '[]')
                                        <button class='booking-btn book_seat_btn' onclick="book_seat({{ $seat->id ?? '' }})">Book a seat
                                        </button>
                                    @endif
                                    @if ($seat->booking != '[]' && Auth::check())
                                        <div style="display: flex; justify-content: space-evenly; flex-direction: row; align-items: flex-end;">
                                        @if (count($seat->booking) == 1 && \Carbon\Carbon::parse($seat->booking[0]->from)->format('H') != 8)
                                                <button class='cancel-booking-btn' onclick="book_seat({{ $seat->id ?? '' }})">Book a seat</button>
                                        @endif
                                        @foreach ($seat->booking as $booking)
                                                    <div class="booked-time{{$seat->seat_number}} user-name-booked-seat half-day-booking">
                                                        @if (\Carbon\Carbon::parse($booking->from)->format('H') == 8 && \Carbon\Carbon::parse($booking->to)->format('H') == 16)
                                                            <div class="user-booking-info mb-4px">
                                                                <div class="d-flex flex-row">
                                                                    <div><img src="{{ $booking->user->user_thumbnail ?? '' }}" class="user-picture-booked-seat"></div>
                                                                    <div class="mx-6px my-auto">{{ $booking->user->given_name }}</div>
                                                                </div>
                                                                <div>{{ 'All day' }}</div>
                                                            </div>
                                                        @elseif (\Carbon\Carbon::parse($booking->from)->format('H') == 8)
                                                            <div class="user-booking-info mb-4px">
                                                                <div><img src="{{ $booking->user->user_thumbnail ?? '' }}" class="user-picture-booked-seat"></div>
                                                                <div>
                                                                    <div> {{ $booking->user->given_name }}</div>
                                                                    <div>{{ 'Before lunch' }}</div>
                                                                </div>
                                                            </div>
                                                        @elseif(\Carbon\Carbon::parse($booking->to)->format('H') == 16)
                                                            <div class="user-booking-info mb-4px">
                                                                <div><img src="{{ $booking->user->user_thumbnail ?? '' }}" class="user-picture-booked-seat"></div>
                                                                <div>
                                                                    <div> {{ $booking->user->given_name }}</div>
                                                                    <div>{{ 'After lunch' }}</div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                            <a href={{ route('deleteBooking', ['booking_id' => $booking->id]) }} class="cancel-booking-btn">
                                                                <button class='cancel-booking-btn' href="">Cancel booking</button>
                                                            </a>
                                                    </div>
                                        @endforeach
                                            @if (count($seat->booking) == 1 && \Carbon\Carbon::parse($seat->booking[0]->to)->format('H') != 16)
                                                    <button class='cancel-booking-btn' onclick="book_seat({{ $seat->id ?? '' }})">Book a seat</button>
                                            @endif
                                        </div>
                                    @endif
                            </div>
</div>
