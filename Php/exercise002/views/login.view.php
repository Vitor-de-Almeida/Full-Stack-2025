<div class="mt-6 grid grid-cols-2 gap-2">
    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">
            Login
        </h1>
        <form class="p-4 space-y-4" action="" method="post">
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="email">
                    Email
                </label>
                <input type="email" name="email" required class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"/>
            </div>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="password">
                    Password
                </label>
                <input type="password" name="password" required class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
            </div>
            <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-2 rounded-md border-2 hover:bg-stone-800">
                Log In
            </button>
        </form>
    </div>
    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">
            Register
        </h1>
        <form class="p-4 space-y-4" action="/register" method="post">
            <?php if ($validations = flash()->get('validations')): ?>
                <div class="px-4 py-1">
                    <div class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 my-2 rounded-md border-2">
                                Errors:
                                <?php foreach ($validations as $validation): ?>
                        <div class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 my-2 rounded-md border-2">
                            <?=$validation?>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <?php unset($_SESSION['validations']); ?>
            <?php endif; ?>
            <?php if (isset($message) && strlen($message) > 0): ?>
                <div class="border-green-800 bg-green-900 text-green-400 px-4 py-1 rounded-md border-2">
                    <?=$message?>
                </div>
            <?php endif; ?>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="name">
                    Name
                </label>
                <input type="text" name="name" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"/>
            </div>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="email">
                    Email
                </label>
                <input type="text" name="email" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"/>
            </div>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="confirm-email">
                    Confirm Email
                </label>
                <input type="text" name="confirm-email" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"/>  
            </div>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="password">
                        Password
                </label>
                <input type="password" name="password" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
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