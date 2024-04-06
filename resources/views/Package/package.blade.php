@php
$trips = \App\Models\Trip::latest()->get();
@endphp

<div class="container pt-5 pb-3">
    <div class="text-center mb-3 pb-3">
        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packages</h6>
        <h1>Perfect Tour Packages</h1>
    </div>
    @if($trips->count() > 0)
        <div class="d-flex flex-wrap">
            @php $counter = 0; @endphp
            @foreach($trips as $trip)
                @if($counter < 6)
                    @php
                        $destination_name = $trip->destination ? $trip->destination->name : "Destination not found";
                        $activity_name = $trip->activity ? $trip->activity->name : "Activity not found";
                    @endphp

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-item bg-white mb-2 h-100">
                            <img class="img-fluid" src="{{ $trip->image }}" alt="" width="1100" height="600" style="height: 250px;">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0">
                                        <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                                        {{ $destination_name }}
                                    </small>
                                    <small class="m-0">
                                        <i class="fa fa-calendar-alt text-primary mr-2"></i>{{ $trip->trip_day }}
                                    </small>
                                    <small class="m-0">
                                        <i class="fa fa-user text-primary mr-2"></i>2 Person
                                    </small>
                                </div>
                                <a class="h8 text-decoration-none" href="#">
                                {!! Illuminate\Support\Str::words($trip->name, 15, '...') !!}
                                </a>
                                <div class="mt-3">
                                    <h6 class="text-primary mb-2">Activities</h6>
                                    <p>{{ $activity_name }}</p>
                                </div>

                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="m-0">
                                            <i class="fa fa-star text-primary mr-2"></i>5 <small></small>
                                        </h6>
                                        <h6 class="m-0">${{ ($trip->actual_price) - ($trip->discount_price )}}</h6>
                                        <a href="{{ route('trip.details', ['id' => $trip->id]) }}" class="btn btn-primary">View Details</a> <!-- Changed position of the button -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    @php $counter++; @endphp
                @endif
            @endforeach
        </div>
    @endif
</div>
<div class="text-center">
    <a href="{{ route('allpackage') }}" class="btn btn-primary">View All Packages</a>
</div>



