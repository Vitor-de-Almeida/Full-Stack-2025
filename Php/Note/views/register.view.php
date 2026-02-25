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
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-3xl lg:text-4xl">Crie sua conta</div>
                        <label class="form-control flex flex-col">
                            <div class="label">
                                <span class="label-text text-black text-xl lg:text-2xl">Name</span>
                            </div>
                            <input type="text" placeholder="Type name here" class="input input-bordered  rounded-md border-2 border-gray-200 w-full max-w-xs bg-white">
                        </label>
                        <label class="form-control flex flex-col">
                            <div class="label">
                                <span class="label-text text-black text-xl lg:text-2xl">Email</span>
                            </div>
                            <input type="text" placeholder="Type email here" class="input input-bordered  rounded-md border-2 border-gray-200 w-full max-w-xs bg-white">
                        </label>
                        <label class="form-control flex flex-col">
                            <div class="label">
                                <span class="label-text text-black text-xl lg:text-2xl">Confirm email</span>
                            </div>
                            <input type="text" placeholder="Type confirm email here" class="input input-bordered  rounded-md border-2 border-gray-200 w-full max-w-xs bg-white">
                        </label>
                        <label class="form-control flex flex-col">
                            <div class="label">
                                <span class="label-text 
                                text-black text-xl lg:text-2xl">Password</span>
                            </div>
                            <input type="password" placeholder="Type password here" class="input input-bordered  rounded-md border-2 border-gray-200 w-full max-w-xs bg-white">
                        </label>
                        <label class="form-control flex flex-col">
                            <div class="label">
                                <span class="label-text 
                                text-black text-xl lg:text-2xl">Confirm password</span>
                            </div>
                            <input type="password" placeholder="Type confirm password here" class="input input-bordered  rounded-md border-2 border-gray-200 w-full max-w-xs bg-white">
                        </label>
                        <div class="card-actions">
                            <button class="btn btn-primary btn-block text-black text-lg lg:text-xl">Register</button>
                            <a href="/login" class="btn btn-link no-underline">Login</a>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>