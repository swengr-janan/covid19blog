@extends('layouts.app')

@section('content')

<div class="container-fixed">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">
                    <strong>REPORT</strong>
                </div>  
                <div class="card-body" style="align-self: center">
                        <div class="select" style="width: 20rem;">
                        <form>
                            <div class="form-group">
                                <!-- <select name="country" class="form-control select2"> -->
                                    <!-- <option value=""><-Select country-></option>-->
                                        @foreach ($country as $country_list)
                                            <!-- <option value="{{$country_list}}">{{$country_list}}</option>-->
                                        @endforeach
                                <!-- </select>-->
                            </div>
                            <!-- <div class="form-group">-->
                                <!-- <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-search-location"></i> Search</button>-->
                           <!--  </div>-->
                        </form>
                        </div>
                        <div class="card" style="width: 20rem;">
                            <img class="card-img-top" src="https://www.clinicaltrialsarena.com/wp-content/uploads/sites/33/2020/02/Coronavirus-in-Philippines.jpg" alt="Card image cap">
                            <div class="card-body" style="align-content: center">
                              <h5 class="card-title">COVID19 Local Monitoring</h5>
                              <p class="card-text">Track COVID-19 local coronavirus cases with active, recoveries and death rate</p>
                            </div>
                            <ul class="list-group list-group-flush pb-3">
                            <li class="list-group-item"><h4 class="text-center">{{$list_data["country"]}}</h4></li>
                            </ul>
                            <table width="100%">
                                <tr>
                                    <th><h2 class="text-center text-info">CONFIRMED</h2></th>
                                </tr>
                                <tr>
                                    <th><h4 class="text-center text-secondary"><i class="fas fa-users"></i> {{$list_data["confirmed"]}}</h4></th>
                                </tr>
                            </table>
                            
                            <div class="card-body">
                              <table width="100%" >
                                  <tr>
                                      <th><h5 class="text-center">DEATHS</h5></th>
                                      <th><h5 class="text-center">RECOVERED</h5></th>
                                  </tr>
                                  <tr>
                                       <td><h5 class="text-center text-danger"><i class="fas fa-book-dead"></i> {{$list_data["deaths"]}}</h5></td>
                                       <td><h5 class="text-center text-success"><i class="fas fa-heart"></i> {{$list_data["recovered"]}}</h5></td>
                                  </tr>
                              </table>
                            </div>
                            <div class="card-footer">
                                <h6 class="text-center  text-primary">{{$list_data["lastUpdate"]}}</h6>
                                
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
@endsection
