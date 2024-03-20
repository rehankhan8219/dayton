@if ($logged_in_user->can('admin.access.risk_calculator'))
    <x-utils.edit-button :href="route('admin.riskcalculator.edit', $riskCalculator)" />
    <x-utils.delete-button :href="route('admin.riskcalculator.delete', $riskCalculator)" />
@endif
