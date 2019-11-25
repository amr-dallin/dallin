<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
return [
    'prevActive' => '<li class="page-item">' . 
        '<a class="page-link" href="{{url}}" aria-label="' . __('Previous') . '">' .
            '<span aria-hidden="true">&laquo;</span>' .
            '<span class="sr-only">' . __('Previous') . '</span>' .
        '</a>' .
    '</li>',
    'prevDisabled' => '',
    'nextActive' => '<li class="page-item">' . 
        '<a class="page-link" href="{{url}}" aria-label="' . __('Next') . '">' .
            '<span aria-hidden="true">&raquo;</span>' .
            '<span class="sr-only">' . __('Next') . '</span>' .
        '</a>' .
    '</li>',
    'nextDisabled' => '',
    'first' => '<a class="pagination__prev" href="{{url}}" title="'. __('First Page') . '">« '. __('First Page') . '</a> ',
    'last' => '<a class="pagination__next" href="{{url}}" title="'. __('Last Page') . '">'. __('Last Page') . ' »</a>',
    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'current' => '<li class="page-item active">' .
        '<a class="page-link" href="#">{{text}} <span class="sr-only">(' . __('Current') . ')</span></a>' .
    '</li>',
    'counterPages' => '<p><br/>'. __('Page') . ' {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total</p>'
    
];
