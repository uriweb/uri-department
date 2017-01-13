<div class="my_meta_control">
	<p>Set customer per-page options</p>
	<label>Print Stylesheet</label>
	<p>
		<select name="_my_meta[style]">
			<option value=""><?php if(!empty($meta['style'])) echo $meta['style']; ?></option>
			<option value="">++++++++</option>
			<option value="print">Default</option>
			<option value="press">Press Release</option>
		</select>
	</p>
	<label>Custom Page CSS</label>
	<p>
		<textarea name="_my_meta[pagecss]" rows="15"><?php if(!empty($meta['pagecss'])) echo $meta['pagecss']; ?></textarea>
		<span>Enter custom css rules. Note this is automatically placed in between style tags, so do not include them.</span>
	</p>
</div>