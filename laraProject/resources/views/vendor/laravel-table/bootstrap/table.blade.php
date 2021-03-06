<div{{ classTag('table-container', $table->containerClasses) }}>
    <table{{ htmlAttributes($table->identifier ? ['id' => $table->identifier] : null) }}{{ classTag('table', $table->tableClasses) }}>
        @include('laravel-table::' . $table->theadComponentPath)
        @include('laravel-table::' . $table->tbodyComponentPath)
    </table>
    @include('laravel-table::' . $table->tfootComponentPath)
</div>
