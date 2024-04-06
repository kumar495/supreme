@php
    $destinations = \App\Models\Destination::all();
@endphp

@php
    $activities = \App\Models\Activity::all();
@endphp

<!-- Booking Start -->
<form action="{{ route('getFilterData') }}" method="GET">
    <div class="container-fluid booking mt-5 pb-5">
        <div class="container pb-5">
            <div class="bg-light shadow" style="padding: 30px;">
                <div class="row align-items-center" style="min-height: 60px;">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 mb-md-0">
                                    <select class="custom-select px-3" style="height: 40px; font-size: 14px;" name="destination_id" required>
                                        <option value="" selected disabled>Destination</option>
                                        @foreach($destinations as $destination)
                                            <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 mb-md-0">
                                    <select class="custom-select px-3" style="height: 40px; font-size: 14px;" name="activity_id" required>
                                        <option value="" selected disabled>Activity</option>
                                        @foreach($activities as $activity)
                                            <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Booking End -->
