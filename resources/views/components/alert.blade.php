@if($type == 'success')
    <div class="rounded-lg w-[600px] h-32  bg-[#1fdd06] text-[#ffffff]">
        <div class="flex flex-row gap-5 justify-center items-center px-7 w-full h-full">
            <div class="my-auto text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle" width="50" height="50">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <path d="m9 11 3 3L22 4"></path>
                </svg>
                <!---->
            </div>
            <!---->
            <div>
                <div class="font-bold text-lg">{{ $judul }}</div>
                <div class=" text-base">{{ $message }}</div>
                <!---->
            </div>
        </div>
    </div>
@elseif($type == 'warning')
    <div class="rounded-lg w-[600px] h-32  bg-[#d4e709] text-[#ffffff]">
        <div class="flex flex-row gap-5 justify-center items-center px-7 w-full h-full">
            <div class="my-auto text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-circle" width="50" height="50">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" x2="12" y1="8" y2="12"></line>
                    <line x1="12" x2="12.01" y1="16" y2="16"></line>
                </svg>
                <!---->
            </div>
            <!---->
            <div>
                <div class="font-bold text-lg">{{ $judul }}</div>
                <div class=" text-base">{{ $message }}</div>
                <!---->
            </div>
        </div>
    </div>
@elseif($type == 'info')
    <div class="rounded-lg w-[600px] h-32  bg-[#0983e7] text-[#ffffff]">
        <div class="flex flex-row gap-5 justify-center items-center px-7 w-full h-full">
            <div class="my-auto text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info" width="50" height="50">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M12 16v-4"></path>
                    <path d="M12 8h.01"></path>
                </svg>
                <!---->
            </div>
            <!---->
            <div>
                <div class="font-bold text-lg">{{ $judul }}</div>
                <div class=" text-base">{{ $message }}</div>
                <!---->
            </div>
        </div>
    </div>
@else
    <div class="rounded-lg w-[600px] h-32  bg-[#fa0000] text-[#ffffff]">
        <div class="flex flex-row gap-5 justify-center items-center px-7 w-full h-full">
            <div class="my-auto text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-circle" width="50" height="50">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="m15 9-6 6"></path>
                    <path d="m9 9 6 6"></path>
                </svg>
                <!---->
            </div>
            <!---->
            <div>
                <div class="font-bold text-lg">{{ $judul }}</div>
                <div class=" text-base">{{ $message }}</div>
                <!---->
            </div>
        </div>
    </div>
@endif
