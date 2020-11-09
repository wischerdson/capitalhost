
<template id="snippet_userDetails_task">
	<li
		class="task-item"
		:class="`status-${task.status}`"
	>
		<div class="front" :class="{active: !hiddenFront}">
			<button class="task-num" @click="updateStatus">@{{ task.step }}</button>
			<div class="text">
				<div class="phase">Этап @{{ task.step }}</div>
				<div class="task-name" @dblclick="quickEdit">@{{ task.name }}</div>
			</div>
			<div class="controls">
				<div class="row" style="margin-bottom: 10px;">
					<button class="btn schedule" :class="{'with-pointer': task.notify_at}" @click="showScheduler">
						@include('admin.svg.schedule')
					</button>
					<button class="btn close" @click="_delete">@include('admin.svg.close')</button>
				</div>
				<div class="row">
					<button class="btn message" :class="{'with-pointer': task.description}" @click="hiddenFront = true">@include('admin.svg.message')</button>
				</div>
			</div>
		</div>
		<div class="back" :class="{active: hiddenFront}">
			<div v-if="editableTask">
				<div class="edit-fields">
					<input type="text" v-model="editableTask.name" class="form-control name" placeholder="Название" ref="taskNameInput">
					<textarea v-model="editableTask.description" class="form-control desc" placeholder="Опишите задачу подробнее"></textarea>
				</div>

				<div class="controls">
					<button class="btn close" @click="disableEditableMode">@include('admin.svg.close')</button>
					<button class="btn apply" @click="saveChanges">@include('admin.svg.check')</button>
				</div>
			</div>

			<div v-else-if="scheduler">
				<div class="scheduler">
					<div class="row">
						<div class="form-group">
							<input type="number" class="form-control hours" placeholder="чч" v-model="scheduler.hour">
							<div class="sep">
								<div class="dot"></div>
								<div class="dot"></div>
							</div>
						</div>
						<input type="number" class="form-control minutes" placeholder="мм" v-model="scheduler.minute">
					</div>
					<div class="row">
						<div class="form-group">
							<select class="form-control months" v-model="scheduler.month">
								<option v-for="(month, index) in months" :value="index">@{{ month }}</option>
							</select>
							<div class="chevron-down">
								@include('svg.chevron-down')
							</div>
							<div class="sep">
								<div class="dot"></div>
							</div>
						</div>
						<div class="form-group">
							<input type="number" class="form-control days" placeholder="дд" v-model="scheduler.day">
							<div class="sep">
								<div class="dot"></div>
							</div>
						</div>
						<input type="number" class="form-control years" placeholder="гггг" v-model="scheduler.year">
					</div>
				</div>
				<div class="controls">
					<button class="btn close" @click="hideScheduler">@include('admin.svg.close')</button>
					<button class="btn apply" @click="saveSchedule">@include('admin.svg.check')</button>
					<button v-if="task.notify_at" class="btn clear-schedule danger" @click="clearSchedule" title="Не напоминать">@include('admin.svg.cancel')</button>
				</div>
			</div>

			<div v-else>
				<div class="text">
					<div class="task-name">@{{ task.name }}</div>
					<div class="task-desc">
						<p v-if="task.description">@{{ task.description }}</p>
						<p v-else>Описание отсутствует</p>
					</div>
				</div>

				<div class="controls">
					<button class="btn close" @click="hiddenFront = false">@include('admin.svg.close')</button>
					<button class="btn edit" @click="enableEditableMode">@include('admin.svg.pencil-fill')</button>
				</div>
			</div>
		</div>
	</li>
</template>