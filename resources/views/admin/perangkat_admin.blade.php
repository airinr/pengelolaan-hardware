<x-app-layout>
    <div class="lg:pl-72">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                     <section id="perangkat" class="py-10 bg-slate-50 dark:bg-slate-900/40">
                            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                            <div class="flex items-end flex-wrap gap-4 justify-between">
                                <div>
                                <h2 class="text-3xl sm:text-4xl font-extrabold">Perangkat Hardware</h2>
                                <p class="mt-2 text-slate-600 dark:text-slate-300">Daftar Perangkat Labolatorium Hardware 609</p>
                                </div>
                                <div class="flex gap-3 w-full sm:w-auto">
                                <input id="filterCari" type="text" placeholder="Cari Data" class="w-full sm:w-64 rounded-lg border border-slate-300 dark:border-slate-600 bg-white/80 dark:bg-slate-900/60 px-3 py-2 text-sm"/>
                                </div>
                            </div>

                            <div class="mt-6 overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700 bg-white/80 dark:bg-slate-900/40">
                                <div class="overflow-x-auto">
                                <table class="min-w-full text-sm">
                                    <thead class="bg-brand-600 text-white">
                                    <tr>
                                        <th class="px-4 py-3 text-left font-semibold">No</th>
                                        <th class="px-4 py-3 text-left font-semibold">Nama Perangkat</th>
                                        <th class="px-4 py-3 text-left font-semibold">Jumlah</th>
                                        <th class="px-4 py-3 text-left font-semibold">Ruang Lab</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbodyJadwal" class="divide-y divide-slate-200 dark:divide-slate-800">
                                    <tr class="hover:bg-brand-50/60 dark:hover:bg-slate-800/60">
                                        <td class="px-4 py-3">1</td>
                                        <td class="px-4 py-3">Motherboard</td>
                                        <td class="px-4 py-3">2</td>
                                        <td class="px-4 py-3">LAB-609</td>
                                    </tr>
                                    <tr class="hover:bg-brand-50/60 dark:hover:bg-slate-800/60">
                                        <td class="px-4 py-3">2</td>
                                        <td class="px-4 py-3">CPU</td>
                                        <td class="px-4 py-3">2</td>
                                        <td class="px-4 py-3">LAB-609</td>
                                    </tr>
                                    <tr class="hover:bg-brand-50/60 dark:hover:bg-slate-800/60">
                                        <td class="px-4 py-3">3</td>
                                        <td class="px-4 py-3">Pin Group</td>
                                        <td class="px-4 py-3">2</td>
                                        <td class="px-4 py-3">LAB-609</td>
                                    </tr>
                                    <tr class="hover:bg-brand-50/60 dark:hover:bg-slate-800/60">
                                        <td class="px-4 py-3">4</td>
                                        <td class="px-4 py-3">RAM</td>
                                        <td class="px-4 py-3">2</td>
                                        <td class="px-4 py-3">LAB-609</td>
                                    </tr>
                                    <tr class="hover:bg-brand-50/60 dark:hover:bg-slate-800/60">
                                        <td class="px-4 py-3">5</td>
                                        <td class="px-4 py-3">Kabel SATA</td>
                                        <td class="px-4 py-3">2</td>
                                        <td class="px-4 py-3">LAB-609</td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                        </section>
                        <section id="perangkat" class="py-10 bg-slate-50 dark:bg-slate-900/40">
                            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                            <div class="flex items-end flex-wrap gap-4 justify-between">
                                <div>
                                <p class="mt-2 text-slate-600 dark:text-slate-300">Daftar Perangkat Rusak Labolatorium Hardware 609</p>
                                </div>
                                <div class="flex gap-3 w-full sm:w-auto">
                                <input id="filterCari2" type="text" placeholder="Cari Data" class="w-full sm:w-64 rounded-lg border border-slate-300 dark:border-slate-600 bg-white/80 dark:bg-slate-900/60 px-3 py-2 text-sm"/>
                                </div>
                            </div>

                            <div class="mt-6 overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700 bg-white/80 dark:bg-slate-900/40">
                                <div class="overflow-x-auto">
                                <table class="min-w-full text-sm">
                                    <thead class="bg-brand-600 text-white">
                                    <tr>
                                        <th class="px-4 py-3 text-left font-semibold">No</th>
                                        <th class="px-4 py-3 text-left font-semibold">Nama Perangkat</th>
                                        <th class="px-4 py-3 text-left font-semibold">Jumlah</th>
                                        <th class="px-4 py-3 text-left font-semibold">Ruang Lab</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbodyJadwal2" class="divide-y divide-slate-200 dark:divide-slate-800">
                                    <tr class="hover:bg-brand-50/60 dark:hover:bg-slate-800/60">
                                        <td class="px-4 py-3">1</td>
                                        <td class="px-4 py-3">Motherboard</td>
                                        <td class="px-4 py-3">2</td>
                                        <td class="px-4 py-3">LAB-609</td>
                                    </tr>
                                    <tr class="hover:bg-brand-50/60 dark:hover:bg-slate-800/60">
                                        <td class="px-4 py-3">2</td>
                                        <td class="px-4 py-3">CPU</td>
                                        <td class="px-4 py-3">2</td>
                                        <td class="px-4 py-3">LAB-609</td>
                                    </tr>
                                    <tr class="hover:bg-brand-50/60 dark:hover:bg-slate-800/60">
                                        <td class="px-4 py-3">3</td>
                                        <td class="px-4 py-3">Pin Group</td>
                                        <td class="px-4 py-3">2</td>
                                        <td class="px-4 py-3">LAB-609</td>
                                    </tr>
                                    <tr class="hover:bg-brand-50/60 dark:hover:bg-slate-800/60">
                                        <td class="px-4 py-3">4</td>
                                        <td class="px-4 py-3">RAM</td>
                                        <td class="px-4 py-3">2</td>
                                        <td class="px-4 py-3">LAB-609</td>
                                    </tr>
                                    <tr class="hover:bg-brand-50/60 dark:hover:bg-slate-800/60">
                                        <td class="px-4 py-3">5</td>
                                        <td class="px-4 py-3">Kabel SATA</td>
                                        <td class="px-4 py-3">2</td>
                                        <td class="px-4 py-3">LAB-609</td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                        </section>
                        
                </div>
        </div>
    </div>
    <script>
        // Reusable filter: filter input -> tbody -> counter
        function attachTableFilter(inputId, tbodyId, countId, labelSingular='baris', labelPlural='baris') {
        const input = document.getElementById(inputId);
        const tbody = document.getElementById(tbodyId);
        const counter = document.getElementById(countId);
        if (!tbody) return;

        const rows = Array.from(tbody.querySelectorAll('tr'));

        function apply() {
            const q = (input?.value || '').trim().toLowerCase();
            let shown = 0;
            rows.forEach(r => {
            const text = r.textContent.toLowerCase();
            const show = !q || text.includes(q);
            r.style.display = show ? '' : 'none';
            if (show) shown++;
            });
            if (counter) {
            const label = shown === 1 ? labelSingular : labelPlural;
            counter.textContent = `Menampilkan ${shown} ${label}`;
            }
        }

        input?.addEventListener('input', apply);
        apply(); // initial
        }

        // Pasang ke TABEL 1 (Perangkat)
        attachTableFilter('filterCari', 'tbodyJadwal', 'countRow', 'perangkat', 'perangkat');

        // Pasang ke TABEL 2 (Perangkat Rusak)
        attachTableFilter('filterCari2', 'tbodyJadwal2', 'countRow2', 'perangkat rusak', 'perangkat rusak');
</script>


</x-app-layout>
