<div style="padding: 30px 0; margin-left: 20px; width: 90%, margin-top:30px;">
    <div class="container bootstrap snippet">
        <div class="row">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <form class="form" wire:submit.prevent="saveProfile">
                <div class="col-sm-3">
                    <div class="text-center">
                        @if ($newimage)
                            <img src="{{ $newimage->temporaryUrl() }}" class="avatar img-circle img-thumbnail"
                                alt="avatar">
                        @elseif($image)
                            <img src="{{ asset('/assets/images/profile') }}/{{ $user->profile->image }}"
                                class="avatar img-circle img-thumbnail" alt="avatar">
                        @else
                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                class="avatar img-circle img-thumbnail" alt="avatar">
                            <h6>Upload a different photo...</h6>
                        @endif
                        <input type="file" class="text-center center-block file-upload" wire:model='newimage'>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-12" class="text-center">
                            <h2>{{ $user->name }}</h2>
                        </div>
                    </div>
                    <hr>

                    <ul class="list-group">
                        <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                        <li class="list-group-item text-right"><span
                                class="pull-left"><strong>Recruitments</strong></span>{{ $totalRecruitments }}
                        </li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Recruitments
                                    Processing</strong></span>{{ $totalRecruitments_processing }}</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Recruitments
                                    Canceled</strong></span>{{ $totalRecruitments_canceled }}</li>
                    </ul>

                    <div class="panel panel-default">
                        <div class="panel-heading">Social Media</div>
                        <div class="panel-body">
                            <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i
                                class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i
                                class="fa fa-google-plus fa-2x"></i>
                        </div>
                    </div>

                </div>
                <!--/col-3-->
                <div class="col-sm-9">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="name">
                                        <h4>Name</h4>
                                    </label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="name" title="enter your name if any." wire:model="name">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email">
                                        <h4>Email</h4>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="you@email.com" title="enter your email." wire:model="email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="phone">
                                        <h4>Date of Birthday</h4>
                                    </label>
                                    <input type="date" class="form-control" name="birthday" id="date_of_birth"
                                        placeholder="birthday" title="enter your birthday." wire:model="date_of_birth">
                                    @error('date_of_birth')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="mobile">
                                        <h4>Mobile</h4>
                                    </label>
                                    <input type="text" class="form-control" name="mobile"
                                        placeholder="enter mobile number" title="enter your mobile number if any."
                                        wire:model="mobile" />
                                    @error('mobile')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="gender">
                                        <h4>Gender</h4>
                                    </label>
                                    <div>
                                        <select class="form-control" name="gender" wire:model="gender">
                                            <option>--Select gender--
                                            </option>
                                            @foreach (['Male', 'Female', 'Other'] as $item)
                                                <option value={{ $item }}>
                                                    {{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @error('gender')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="marital_status">
                                        <h4>Marital Status</h4>
                                    </label>
                                    <div>
                                        <select class="form-control" name="marital_status"
                                            wire:model="marital_status">
                                            <option>--Select marital status--
                                            </option>
                                            @foreach (['Single', 'Married'] as $item)
                                                <option value={{ $item }}>
                                                    {{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @error('marital_status')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="city">
                                        <h4>City</h4>
                                    </label>
                                    <input type="text" class="form-control" name="city" id="location"
                                        placeholder="somewhere" title="enter your city" wire:model="city">
                                    @error('city')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="province">
                                        <h4>Province</h4>
                                    </label>
                                    <input type="text" class="form-control" id="location" name="province"
                                        placeholder="somewhere" title="enter province" wire:model="province">
                                    @error('province')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="country">
                                        <h4>Country</h4>
                                    </label>
                                    <input type="text" class="form-control" name="country" id="location"
                                        placeholder="somewhere" title="enter country" wire:model="country">
                                    @error('country')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="address">
                                        <h4>Address</h4>
                                    </label>
                                    <input type="text" class="form-control" name="address" id="location"
                                        placeholder="somewhere" title="enter intro" wire:model="address">
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <label for="intro">
                                        <h4>Intro</h4>
                                    </label>
                                    <textarea type="text" class="form-control" name="intro" id="intro" placeholder="somewhere"
                                        title="enter intro" wire:model="intro"></textarea>
                                    @error('intro')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit"
                                        wire:submit.prevent="saveProfile"><i class="glyphicon glyphicon-ok-sign"></i>
                                        Save</button>
                                    <button class="btn btn-lg" type="reset"><i
                                            class="glyphicon glyphicon-repeat"></i> Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            <hr>
        </div>
        <!--/tab-pane-->
    </div>
    <!--/tab-content-->
</div>
<!--/col-9-->
</div>
<!--/row-->
</div>
</div>
</div>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    @stack('scripts')

@push('scripts')
    <script>
        $(document).ready(function() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.avatar').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".file-upload").on('change', function(){
                readURL(this);
            });
        });
    </script>
@endpush --}}
