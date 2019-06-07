 * Copyright (c) Facebook, Inc. and its affiliates.
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

/**
 * This file was moved from fbsource to www. View old history in diffusion:
 * https://fburl.com/z5l3wuo7

<<\Oncalls('open_source')>>
    /* HH_IGNORE_ERROR[2049] __PHPStdLib */
    /* HH_IGNORE_ERROR[4107] __PHPStdLib */
    \file_put_contents($temp_dir->getPath().'/initial.txt', 'my content here');
    $this->execSteps($temp_dir->getPath(), ImmVector {'hg', 'init'});
      ImmVector {'hg', 'commit', '-Am', 'initial commit'},
      ImmVector {'hg', 'mv', 'initial.txt', 'moved.txt'},
      ImmVector {'chmod', '755', 'moved.txt'},
      ImmVector {'hg', 'commit', '-Am', 'moved file'},
    $repo = new ShipItRepoHG($temp_dir->getPath(), 'master');
    $changeset = \expect($changeset)->toNotBeNull();
    /* HH_IGNORE_ERROR[2049] __PHPStdLib */
    /* HH_IGNORE_ERROR[4107] __PHPStdLib */
    \expect($changeset->getSubject())->toBeSame('moved file');
    $diffs = Map {};
    $wanted_files = ImmSet {'initial.txt', 'moved.txt'};
      \expect($diffs->keys())->toContain($file);
      \expect($diff)->toContainSubstring('my content here');
    \expect($diffs['initial.txt'])
      ->toContainSubstring('deleted file mode 100644');
    \expect($diffs['moved.txt'])->toContainSubstring('new file mode 100755');