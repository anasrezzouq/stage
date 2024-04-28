<nav x-data="{ open: false }" class="">
    <!-- Primary Navigation Menu -->
    
                <!-- Logo -->
                

                <!-- Navigation Links -->
                

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger ml-4 ">Logout</button>
            </form>

          