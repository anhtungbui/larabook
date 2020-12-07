<form wire:submit.prevent="submitComment">
    <div class="form-row pt-2">
        <div class="col-10">
            <textarea 
                type="text"
                rows="1"
                name="content" 
                class="form-control @error('content') is-invalid @enderror" 
                wire:model.lazy="content"
                placeholder="Write a comment..."
            ></textarea>
            
            @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-2">
            <input type="submit" class="btn btn-primary btn-block" value="Post">
        </div>
    </div>
</form>

