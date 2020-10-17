
        <div class="flex flex-col mt-2">
            <label for="name" class="hidden">Name</label>
            <input type="text" name="name" id="name" value="{{old('name') ?? $role->name}}" placeholder="Name" class="w-100 text-sm mt-2 py-2 px-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
        </div>
        @error('name')
        <div class="mt-2 block text-sm text-left text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm" role="alert">
            {{$message}}
        </div>
        @enderror
        <div class="flex flex-col mt-2">
            <label for="guard_name" class="hidden">Guard Name</label>
            <input type="text" name="guard_name" id="guard_name" value="{{old('guard_name') ?? $role->guard_name}}" placeholder="Guard Name default 'web'" class="w-100 text-sm mt-2 py-2 px-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
        </div>
        @error('guard_name')
        <div class="mt-2 block text-sm text-left text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm" role="alert">
            {{$message}}
        </div>
        @enderror
        <button type="submit" class="mt-3 text-sm bg-teal-500 hover:bg-teal-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
            {{$submit}}
        </button>
