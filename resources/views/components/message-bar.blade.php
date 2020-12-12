<!-- Hidden Alerts -->
<div class="alert alert-dark alert-solid shadow-sm message-bar" style="display: none;" role="alert">
    <i class="fas fa-check-circle mr-2"></i>
    <span>Message content</span>
</div>

@push('custom-scripts')
    <script>
        function flashMessage(message) {
            $('.message-bar span').text(message);
            $('.message-bar').fadeIn();
            
            setTimeout(() => {
                $('.message-bar').fadeOut('slow');
            }, 3000);
        }
        
        window.addEventListener('action-performed', event => {
            flashMessage(event.detail.message);
        });
        
        @if (Session::has('message')) {
            // alert('hello');
            let message = "{{ Session::get('message') }}"
            flashMessage(message);
        }
        @endif

        // window.addEventListener('action-performed', event => {
        //     $('.message-bar span').text(event.detail.message);
        //     $('.message-bar').fadeIn();

        //     setTimeout(() => {
        //         $('.message-bar').fadeOut('slow');
        //     }, 3000);
        // });
    </script>
    
@endpush