<div id="lightbox" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/90 p-4">
  <button onclick="closeLB()" class="absolute right-5 top-5 text-white/80 hover:text-white"><i data-lucide="x" class="h-7 w-7"></i></button>
  <button onclick="stepLB(-1)" class="absolute left-4 text-white/80 hover:text-white sm:left-8"><i data-lucide="chevron-left" class="h-9 w-9"></i></button>
  <button onclick="stepLB(1)" class="absolute right-4 text-white/80 hover:text-white sm:right-8"><i data-lucide="chevron-right" class="h-9 w-9"></i></button>
  <div id="lbContent" class="max-h-[85vh] w-full max-w-4xl"></div>
</div>
