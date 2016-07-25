
let g:path_myslq_plugin = expand('<sfile>:p:h')

function! MySQLCompleteFunction( findstart, base )
  if a:findstart
    let line = getline('.')
    let start = col('.') - 1
    while start > 0 && line[start - 1] =~ '[A-Za-z_.]'
        let start -= 1
    endwhile
    return start
  else
    let command = "php ".g:path_myslq_plugin."/db.php '".g:database_host."' '".g:database_user."' '".g:database_password."' '".g:database_database."' '".a:base."'"
    let output = system( command )
    let matches = split(output, ';')
    let result = []
    for i in matches
        let exploded = split(i, '/')
       call add(result, {'word' : exploded[0], 'kind' : exploded[2], 'menu' : exploded[1]}) ", 'info': 'int'
    endfor
    return result
  endif
endfunction


function! DatabasePrefixesInit(word)
    let command = "php ".g:path_myslq_plugin."/db.php '".g:database_host."' '".g:database_user."' '".g:database_password."' '".g:database_database."' 'prefixes' '".a:word."'"
    return system( command )
endfunction


