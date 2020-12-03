<!-- Left column -->
<section class="col-xl-4 d-none d-lg-block">
    <!-- Intro card-->
    <livewire:sidebar.intro-card :user="$user" />
   
    <!-- Friends list (sidebar)-->
    <livewire:sidebar.friends-list :user="$user" />
    
    <!-- Footer -->
    <x-footer type="light"/>
</section>