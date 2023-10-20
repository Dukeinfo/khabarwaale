<div class="bg10 p-rl-35 p-t-28 p-b-30 m-b-55">
    <h5 class="f1-m-5 cl0 p-b-10">
        Subscribe
    </h5>
    <p class="f1-s-1 cl0 p-b-25">
        Get all latest content delivered to your email a few times a month.
    </p>
    <form class="size-a-9 pos-relative"   wire:submit.prevent="subscribe">  

        @csrf
        <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" wire:model='email' name="email" placeholder="Email">
        @error('email')
        <div class="alert alert-danger">
            {{ $message}}</span>
        @enderror
        <button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03" type="submit" wire:loading.attr="disabled" >
            <i class="fa fa-arrow-right"></i>
        </button>
    </form>
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
</div>