@extends('layouts.default')

@section('main')
    <article class="article">
        <p class="paragraph">Übersicht aller Kinder sortiert nach absteigenden Kontostand. Praktisch für ein Gesamtüberblick.</p>
        <div class="overview">
            <table class="overview__table">
                <thead class="overview__header">
                    <tr class="overview__row">
                        <th class="overview__cell">Name</th>
                        <th class="overview__cell">Kontostand</th>
                        <th class="overview__cell">Patenschaft</th>
                        <th class="overview__cell"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($debitEntries as $debitEntry)
                        <tr class="overview__row">
                            <td class="overview__cell">{{ $debitEntry->first_name . ' ' . $debitEntry->last_name }}</td>
                            <td class="overview__cell">{{number_format($debitEntry->amount_left, 2, ',', '.')}} €</td>
                            <td class="overview__cell">
                                <a class="link" href="{{action('GodparenthoodController@show', ['godparenthood' => $debitEntry->godparenthood_id])}}">{{ $debitEntry->godparenthood_title }}</a>
                            </td>
                            <td class="overview__cell overview__cell--fit-to-content">
                                <a class="button button--primary button--without-text" href="{{action('ChildController@show', ['child' => $debitEntry])}}">
                                    <svg class="button__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 511.626 511.626" style="enable-background:new 0 0 511.626 511.626;" xml:space="preserve">
                                        <g>
                                            <path fill="#000" d="M505.918,236.117c-26.651-43.587-62.485-78.609-107.497-105.065c-45.015-26.457-92.549-39.687-142.608-39.687
                                                c-50.059,0-97.595,13.225-142.61,39.687C68.187,157.508,32.355,192.53,5.708,236.117C1.903,242.778,0,249.345,0,255.818
                                                c0,6.473,1.903,13.04,5.708,19.699c26.647,43.589,62.479,78.614,107.495,105.064c45.015,26.46,92.551,39.68,142.61,39.68
                                                c50.06,0,97.594-13.176,142.608-39.536c45.012-26.361,80.852-61.432,107.497-105.208c3.806-6.659,5.708-13.223,5.708-19.699
                                                C511.626,249.345,509.724,242.778,505.918,236.117z M194.568,158.03c17.034-17.034,37.447-25.554,61.242-25.554
                                                c3.805,0,7.043,1.336,9.709,3.999c2.662,2.664,4,5.901,4,9.707c0,3.809-1.338,7.044-3.994,9.704
                                                c-2.662,2.667-5.902,3.999-9.708,3.999c-16.368,0-30.362,5.808-41.971,17.416c-11.613,11.615-17.416,25.603-17.416,41.971
                                                c0,3.811-1.336,7.044-3.999,9.71c-2.667,2.668-5.901,3.999-9.707,3.999c-3.809,0-7.044-1.334-9.71-3.999
                                                c-2.667-2.666-3.999-5.903-3.999-9.71C169.015,195.482,177.535,175.065,194.568,158.03z M379.867,349.04
                                                c-38.164,23.12-79.514,34.687-124.054,34.687c-44.539,0-85.889-11.56-124.051-34.687s-69.901-54.2-95.215-93.222
                                                c28.931-44.921,65.19-78.518,108.777-100.783c-11.61,19.792-17.417,41.207-17.417,64.236c0,35.216,12.517,65.329,37.544,90.362
                                                s55.151,37.544,90.362,37.544c35.214,0,65.329-12.518,90.362-37.544s37.545-55.146,37.545-90.362
                                                c0-23.029-5.808-44.447-17.419-64.236c43.585,22.265,79.846,55.865,108.776,100.783C449.767,294.84,418.031,325.913,379.867,349.04
                                                z"/>
                                        </g>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </article>
@endsection
