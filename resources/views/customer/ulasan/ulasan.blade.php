<div class="py-12 px-[50px] w-full flex flex-col items-center space-y-8">
    <div class="w-full max-w-6xl">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white text-center w-full">
                Ulasan</h2>
        </div>
        <form class="">
            <div
                class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea id="comment" name="comment"
                    class="px-0 resize-none h-30 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                    placeholder="Tuliskan Ulasan anda..."></textarea>
            </div>
            <button type="submit"
                class="inline-flex items-center py-3 px-6 text-sm font-medium text-center text-white bg-[#508D4E] rounded-lg hover:bg-[#5ea55b] cursor-pointer">
                Post Ulasan
            </button>
        </form>
    </div>
    <div class="max-h-[400px] w-full max-w-6xl overflow-y-auto space-y-5 scrollbar-hidden">
        @forelse ($ulasans as $ulasan)
            <x-card-ulasan :ulasan="$ulasan" />
        @empty
        @endforelse
    </div>
</div>
