@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="username"><strong>Username:</strong></label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="{{$user->name}}" readonly/>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email"><strong>Email:</strong></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="{{$user->email}}" readonly/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="phone"><strong>Phone:</strong></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{old('phone')}}" placeholder="Phone"/>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="gender"><strong>Gender:</strong></label>
                                    <select class="form-control" name="gender" id="gender">
                                        <option {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="bloodtype"><strong>Blood Type:</strong></label>
                                    <select class="form-control" name="bloodType" id="bloodType">
                                        <option {{ old('bloodType') == 'A+' ? 'selected' : '' }}>A+</option>
                                        <option {{ old('bloodType') == 'A-' ? 'selected' : '' }}>A-</option>
                                        <option {{ old('bloodType') == 'B+' ? 'selected' : '' }}>B+</option>
                                        <option {{ old('bloodType') == 'B-' ? 'selected' : '' }}>B-</option>
                                        <option {{ old('bloodType') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                        <option {{ old('bloodType') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                        <option {{ old('bloodType') == 'O+' ? 'selected' : '' }}>O+</option>
                                        <option {{ old('bloodType') == 'O-' ? 'selected' : '' }}>O-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-12">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="subPlan"><strong>Subscription Plan:</strong></label>
                                    <select class="form-control" name="subPlan" id="subPlan">
                                        <option value="1" {{ old('subPlan') == '1' ? 'selected' : '' }}>Basic</option>
                                        <option value="2" {{ old('subPlan') == '2' ? 'selected' : '' }}>Standard</option>
                                        <option value="3" {{ old('subPlan') == '3' ? 'selected' : '' }}>Premium</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="pay"><strong>Payment Method:</strong></label>
                                    <select class="form-control" name="pay" id="pay">
                                        <option {{ old('pay') == 'Debit Card' ? 'selected' : '' }}>Debit Card</option>
                                        <option {{ old('pay') == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
                                        <option {{ old('pay') == 'BKash' ? 'selected' : '' }}>Bkash</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="propic"><strong>Profile Picture:</strong></label>
                                    <input type="file" class="form-control-file @error('propic') is-invalid @enderror" id="propic" name="propic">
                                </div>

                                @error('propic')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-12">
                                <input type="submit" class="btn btn-block btn-primary" value="Submit" id="submit"/>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-auto">
        </div>
    </div>
</div>
@endsection  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
