

@if (Route::has('login'))
        <nav class="bg-purple-950 flex">
            <!-- Logo -->
            <a  class="my-auto mx-0" href="{{route('home')}}">
                <div class="flex my-auto pe-8 bg-white border-b-2 border-purple-900 rounded-br-full">
            <div class="text-black ml-2.5 ">
                SDLabs.cc
                <br>
                <p class="text-xs">Speaker Designs</p>
            </div>
            </div>
            </a>
            <!--Links-->
            <div class="flex text-sm">
                <ul class="flex">
                    <li class="content-center text-white px-5 hover:text-white hover:bg-purple-900">
                    <a href="{{route('designs')}}">Browse Designs</a>
                    </li>
                <li class="content-center text-white px-5 hover:text-white hover:bg-purple-900">
                <a href="{{route('drivers')}}" >Driver Database</a>
                </li>
                <li class="content-center text-white px-5 hover:text-white hover:bg-purple-900">
                <a href="#">SoapBox</a>
                </li>
                <li class="content-center text-white px-5 hover:text-white hover:bg-purple-900">
                <a href="#" >Community Forum</a>
                </li>
                </ul>
            </div>

            <!--Account-->
            <div class="ms-auto sm:hidden md:flex">
            @auth
               <a href="/manage" class="content-center text-white px-5 hover:text-white hover:bg-purple-900">{{auth()->user()->name}}</a>
                <a href="{{ route('logout') }}" class="content-center text-white px-5 hover:text-white hover:bg-purple-900">Logout</a>

            @else
                <a href="{{ route('login') }}" class="content-center text-white px-5 hover:text-white hover:bg-purple-900">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="content-center text-white px-5 hover:text-white hover:bg-purple-900">Register</a>
                @endif
            @endauth
            </div>
        </nav>
    @endif
