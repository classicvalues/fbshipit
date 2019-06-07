 * Copyright (c) Facebook, Inc. and its affiliates.
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

/**
 * This file was moved from fbsource to www. View old history in diffusion:
 * https://fburl.com/yz6eqiy0
use namespace HH\Lib\Str;
use type Facebook\ShipIt\{ShipItChangeset};

  /**
   * Like ShipItSubmoduleFilter, but produces a plain file instead of a
   * real submodule.
   */
  <<\TestsBypassVisibility>>
    ?string $old_rev,
    ?string $new_rev,
    if ($old_rev === null && $new_rev !== null) {
      return Str\format(
        'new file mode 100644
--- /dev/null
+++ b/%s
@@ -0,0 +1 @@
+Subproject commit %s
',
        $path,
        $new_rev,
      );
    } else if ($new_rev === null && $old_rev !== null) {
      return Str\format(
        'deleted file mode 100644
--- a/%s
+++ /dev/null
@@ -1 +0,0 @@
-Subproject commit %s
',
        $path,
        $old_rev,
      );
    } else {
      return Str\format(
        '--- a/%s
+++ b/%s
@@ -1 +1 @@
-Subproject commit %s
+Subproject commit %s
',
        $path,
        $path,
        $old_rev ?? '',
        $new_rev ?? '',
      );
    }
    $diffs = Vector {};
      $new_rev = null;
      $old_rev = null;
      /* HH_IGNORE_ERROR[2049] __PHPStdLib */
      /* HH_IGNORE_ERROR[4107] __PHPStdLib */
      foreach (\explode("\n", $body) as $line) {
        /* HH_IGNORE_ERROR[2049] __PHPStdLib */
        /* HH_IGNORE_ERROR[4107] __PHPStdLib */
          $old_rev = Str\trim(Str\slice($line, 19));
          /* HH_IGNORE_ERROR[2049] __PHPStdLib */
          /* HH_IGNORE_ERROR[4107] __PHPStdLib */
          $new_rev = Str\trim(Str\slice($line, 19));
          $new_rev ?? 'null',
          $old_rev ?? 'null',
        'body' =>
          self::makeSubmoduleDiff($text_file_with_rev, $old_rev, $new_rev),