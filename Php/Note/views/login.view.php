<div class="grid grid-cols-1 lg:grid-cols-2 lg:min-h-screen">
    <div class="hero min-h-[50vh] lg:min-h-screen">
      <div class="hero-content mb-8 lg:mb-20">
        <div>
          <p class="py-2 lg:py-4 text-xl">Welcome</p>
          <h1 class="text-4xl lg:text-6xl font-bold">LockBox</h1>
          <p class="pt-2 pb-4 lg:pt-4 lg:pb-8 text-xl">Where you keep<span class="italic">all</span> with confidence.</p>
        </div>
      </div>
    </div>
    <div class="bg-white hero-content lg:min-h-screen text-black">
        <div class="hero-content mb-8 mt-8 lg:mb-20 lg:mt-20">
            <form method="post" action="/login">
                <?php dd(flash()->get('validations')); ?>
                <div class="card">
                    <div class="card-body gap-2 lg:gap-4">
                        <div class="card-title text-3xl lg:text-4xl">Login</div>
                        <div role="alert" class="alert alert-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                            <span>Invalid email or password</span>
                        </div>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-black text-xl lg:text-2xl">Email</span>
                            </div>
                            <input type="text" placeholder="Type email here" class="input input-bordered border-2 border-gray-300 w-full max-w-xs bg-white">
                        </label>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text 
                                text-black text-xl lg:text-2xl">Password</span>
                            </div>
                            <input type="password" placeholder="Type password here" class="input input-bordered border-2 border-gray-300 w-full max-w-xs bg-white">
                        </label>
                        <div class="card-actions">
                            <button class="btn btn-primary btn-block text-black text-lg lg:text-xl">Login</button>
                            <a href="/register" class="btn btn-link no-underline">Register</a>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>