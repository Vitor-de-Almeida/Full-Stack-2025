<div class="mt-6 grid grid-cols-2 gap-2">
    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">
            Login
        </h1>
        <form class="p-4 space-y-4" action="">
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="">
                    Email
                </label>
                <input type="email" name="email" required class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"/>
            </div>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="">
                    Senha
                </label>
                <input type="password" name="email" required class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
            </div>
            <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-2 rounded-md border-2 hover:bg-stone-800">
                Log In
            </button>
        </form>
    </div>
    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">
            Registro
        </h1>
        <form class="p-4 space-y-4" action="">
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="">
                    Name
                </label>
                <input type="text" name="name" required class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"/>
            </div>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="">
                    Email
                </label>
                <input type="email" name="email" required class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"/>
            </div>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="">
                    Confirm Email
                </label>
                <input type="email" name="confirm_email" required class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"/>
            </div>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="">
                    Password
                </label>
                <input type="password" name="password" required class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
            </div>
            <button type="reset" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-2 rounded-md border-2 hover:bg-stone-800">
                Cancel
            </button>
            <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-2 rounded-md border-2 hover:bg-stone-800">
                Register
            </button>
        </form>
    </div>
</div>