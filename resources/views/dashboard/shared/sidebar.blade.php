@php
  $qualification = DB::table('qualifications')->get();
@endphp

<div class="c-sidebar-brand">
  <!-- <img class="c-sidebar-brand-full" src="{{ url('/assets/brand/coreui-base-white.svg') }}" width="118" height="46" alt="CoreUI Logo">
  <img class="c-sidebar-brand-minimized" src="{{ url('assets/brand/coreui-signet-white.svg') }}" width="118" height="46" alt="CoreUI Logo"> -->
</div>
<ul class="c-sidebar-nav">
  @if(Auth::user()->id == 1)
  <li class="c-sidebar-nav-title">@lang('Admin Configuration')</li>
  <li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{ route('institution.index') }}">
      <i class="cil-speedometer c-sidebar-nav-icon"></i>
      Institutions
    </a>
  </li>

  <li class="c-sidebar-nav-title">@lang('Criteria Configuration')</li>

  <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle"> <i class="cil-speedometer c-sidebar-nav-icon"></i> Criteria </a>
    <ul class="c-sidebar-nav-dropdown-items">
       <a  href="{{ route('feedcrits.index') }}">
        <li class="c-sidebar-nav-link">
            Feed Formulation and Mixing
          </li>
       </a>
       <a  href="{{ route('asexualcrits.index') }}">
          <li class="c-sidebar-nav-link" >
              Asexual Propagation Criteria
          </li>
       </a>
       <a  href="{{ route('knapsackcrits.index') }}">
          <li class="c-sidebar-nav-link" >
             Knapsack Sprayer Calibration
          </li>
       </a>
       <a  href="{{ route('bakingcrits.index') }}">
          <li class="c-sidebar-nav-link" >
             Baking
          </li>
       </a>
       <a  href="{{ route('cookingcrits.index') }}">
          <li class="c-sidebar-nav-link" >
             Cooking
          </li>
       </a>
       <a  href="{{ route('restaurantcrits.index') }}">
          <li class="c-sidebar-nav-link" >
             Restaurant Services
          </li>
       </a>
       <a  href="{{ route('patisseriecrits.index') }}">
          <li class="c-sidebar-nav-link" >
            Patisserie & Confectionary
          </li>
       </a>
       <a  href="{{ route('weldingcrits.index') }}">
        <li class="c-sidebar-nav-link" >
          Welding
        </li>
     </a>
    </ul>
  </li>
  @endif
  <li class="c-sidebar-nav-title">@lang('Qualification')</li>

  <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle"> <i class="cil-speedometer c-sidebar-nav-icon"></i> Qualification </a>
    <ul class="c-sidebar-nav-dropdown-items">
     @foreach ($qualification as $quali)
        @if( Auth::user()->quali_id == $quali->id)
        <a  href="{{ URL::to('/qualiCon/'.$quali->id) }}">
          <li class="c-sidebar-nav-link">
          {{ $quali->quali_name }}
            </li>
        </a>
        @elseif( Auth::user()->quali_id == null)
        <a  href="{{ URL::to('/qualiCon/'.$quali->id) }}">
          <li class="c-sidebar-nav-link">
          {{ $quali->quali_name }}
            </li>
        </a>
        @endif
       @endforeach
    </ul>
  </li>
  <li class="c-sidebar-nav-title">@lang('System')</li>

  @role('admin')
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link" href="{{ route('users.index') }}">
        <i class="cil-people c-sidebar-nav-icon"></i>
        Users
      </a>
    </li>

    <!-- <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link" href="">
        <i class="cil-calendar c-sidebar-nav-icon"></i>
        School Year
      </a>
    </li>

    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link" href="">
        <i class="cil-list-numbered c-sidebar-nav-icon"></i>
        Grade Levels
      </a>
    </li> -->
  @endrole

  <li class="c-sidebar-nav-item">
    <form action="{{ url('/logout') }}" method="POST"> @csrf 
      <span class="c-sidebar-nav-link logout-link" style="cursor:pointer">
        <i class="cil-account-logout c-sidebar-nav-icon"></i>
        Logout
      </span>
    </form>
  </li>

</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>