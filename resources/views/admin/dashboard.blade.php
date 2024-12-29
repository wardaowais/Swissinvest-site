@extends('admin/layouts.app')

@section('content')
<div class="row">
<div class="col-lg-4 col-md-6 mt-4 mb-4">
  <div class="card bg-transparent shadow-xl">
    <div class="overflow-hidden position-relative border-radius-xl">
      <img src="{{asset('assets/img/illustrations/pattern-tree.svg')}}" class="position-absolute opacity-2 start-0 top-0 w-100 z-index-1 h-100" alt="pattern-tree">
      <span class="mask bg-gradient-dark opacity-10"></span>
      <div class="card-body position-relative z-index-1 p-3">
        <div class="d-flex justify-content-center">
          <!-- <a href="deposit" class="btn btn-primary me-3">Deposit</a>
          <a href="withdraw" class="btn btn-primary">Withdraw</a> -->
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-4 col-md-6 mt-4 mb-4">
  <div class="card bg-transparent shadow-xl">
    <div class="overflow-hidden position-relative border-radius-xl">
      <img src="{{asset('assets/img/illustrations/pattern-tree.svg')}}" class="position-absolute opacity-2 start-0 top-0 w-100 z-index-1 h-100" alt="pattern-tree">
      <span class="mask bg-gradient-dark opacity-10"></span>
      <div class="card-body position-relative z-index-1 p-3">
        <div class="d-flex justify-content-center">
          <!-- <a href="deposit" class="btn btn-primary me-3">Deposit</a>
          <a href="withdraw" class="btn btn-primary">Withdraw</a> -->
        </div>
      </div>
    </div>
  </div>
</div>

</div>
@endsection
