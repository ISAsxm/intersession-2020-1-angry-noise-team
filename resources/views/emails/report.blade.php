<div class="mail-container">
    @foreach($report->getIndividualReports() as $individualReport)
        {{ $individualReport->getJson() }}
    @endforeach()
</div>