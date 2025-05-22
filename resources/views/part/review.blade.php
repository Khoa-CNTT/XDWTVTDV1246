<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Đánh Giá') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2 class="text-center mb-4 text-lg font-semibold">Bình luận</h2>

                    <form id="commentForm">
                        <textarea id="commentInput" placeholder="Viết bình luận..." required
                            class="w-full h-20 p-2 border border-gray-300 rounded resize-y text-sm"></textarea>
                        <button type="submit"
                            class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition" style="color: black;border: 1px solid black; ">Gửi
                            bình luận</button>
                    </form>

                    <div id="comments" class="mt-6 border-t border-gray-300 pt-4">
                        <!-- Bình luận sẽ hiện ở đây -->
                    </div>

                </div>
            </div>
        </div>
    </div>

  

 
</x-app-layout>

