@extends('layouts.app')

@section('content')

    <div class="row text-center justify-content-center text-light" style="height: 100%">

        <div class="col-6 bg-primary py-4 justify-content-center">
            <div class="row p-4 d-flex justify-content-center">
                <div class="col-8 my-2 p-3 text-left">
                    <p><i class="fa fa-search" style="font-size: 24px" ></i>  Ikuti yang kamu sukai</p>     
                </div>
                <div class="col-8 my-2 p-3 text-left">
                    <p><i class="fas fa-user-friends" style="font-size: 24px"></i> Dengar apa yang sedang jadi perbincangan.</p>    
                </div>
                <div class="col-8 my-2 p-3 text-left">
                    <p><i class="fa fa-comment-alt" style="font-size: 24px"></i>  Gabung ke perbincangan.</p>
                </div>      
            </div>
        </div>

        <div class="col-6 bg-dark ">
            <div class="row p-4 d-flex ">
                <div class="col-12 ">
                    <form >
                        <div class="row ">
                            <div class="col">
                                <input type="text" class="form-control h-100" placeholder="First name">
                            </div>
                            <div class="col">
                                <input type="password" class="form-control h-100" placeholder="Password">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary rounded-pill mb-2">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row p-4 d-flex justify-content-center">
                <div class="col-8 my-2 text-left">
                    <i class="fab fa-twitter" style="font-size: 48px"></i>
                </div>
                <div class="col-8 my-2 text-left">
                    <h3>Lihat apa yang terjadi pada dunia sekarang.</h3>
                </div>
                <div class="col-8 my-2 text-left">
                    <h6>Gabung cuitan hari ini.</h6>
                </div>
                <div class="col-8 my-2">
                    <button type="button" class="btn btn-primary rounded-pill mb-2 w-100" data-toggle="modal" data-target="#exampleModalCenter">Daftar</button>
                </div>
                
            </div>
            
        </div>
    </div>

   <!-- Modal -->
<div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header text-center">
                <i class="fab fa-twitter modal-title" style="font-size: 24px"></i>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>          
        </div>
        <div class="modal-body">
            <form >
                <div class="row">
                    <div class="col-12 my-2">
                        <h3>Create Your Account</h3>                    
                    </div>
                    <div class="col-12 my-2">
                        <input type="text" class="form-control h-100" placeholder="First name">
                    </div>
                    <div class="col-12 my-2">
                        <input type="text" class="form-control h-100" placeholder="Last name">
                    </div>
                    <div class="col-12 my-2">
                        <a href="">Use email instead!</a>
                    </div>
                    <div class="col-12 my-2">
                        <h5>Date of birth</h5>
                        <p>This will not shown publicity. Confirm your own age, even if this account is for
                            a bussiness, a pet, or somethinf else.
                        </p>          
                        <input type="date" name="" id="">                 
          
                    </div>
                </div>
            </form>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

    @include('headfoot.footer')
 
    
@endsection
