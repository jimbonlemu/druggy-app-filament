<x-filament-panels::page class="fi-dashboard-page">
    @if (method_exists($this, 'filtersForm'))
        {{ $this->filtersForm }}
    @endif

    <x-filament-widgets::widgets :columns="$this->getColumns()" :data="[...property_exists($this, 'filters') ? ['filters' => $this->filters] : [], ...$this->getWidgetData()]" :widgets="$this->getVisibleWidgets()" />
    <footer class="text-center text-xs text-gray-400 mt-4">
        {{ $appSignature ?? '© 2025 by Mochamad Iqbal Maulana TIF' }}
    </footer>
</x-filament-panels::page>
